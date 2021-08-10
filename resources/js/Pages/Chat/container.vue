<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <chat-room-selection
                v-if="currentRoom.id"
                :rooms="chatRooms"
                :currentRoom="currentRoom"
                v-on:roomchange="setRoom( $event )"
                />
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   <message-container :message="messages"/>
                   <input-message 
                    v-on:messagesent="getMessages()"
                   :room="currentRoom"/>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import MessageContainer from './messageContainer.vue'
import InputMessage from './inputMessage.vue'
import ChatRoomSelection from './chatRoomSelection.vue'

    export default {
        components: {
                AppLayout,
                MessageContainer,
                InputMessage,
                ChatRoomSelection,
          
        },
        data: function (){
            return {
                chatRooms: [],
                currentRoom: [],
                messages: []
            }
        },
        watch : {
            currentRoom(val, oldVal){
               // if Oldval.id is true disconnect
               if(oldVal.id){
                    this.disconnect(oldVal);
               }
               this.connect();
            }
        },
        methods: {
             connect () {  
                if ( this.currentRoom.id ) {
                    let vm = this;
                    this.getMessages();
                    window.Echo.private("chat." + this.currentRoom.id )
                    .listen('.message.new', e => {
                       vm.getMessages()
                    });   
                }
            },
            disconnect ( room) {
                //leave chat room
                window.Echo.leave("chat." + room.id );

            },
            getRooms(){
                axios.get('/chat/rooms')
               .then( (response) => {
                console.log("getRooms..")
                   this.chatRooms = response.data;
                   console.log(response.data[0])
                   this.setRoom (response.data[0]) 
        
               })
               .catch ((error) => {
                   console.log(error);
               }) 
            },
            setRoom(room) {
          
                this.currentRoom = room;
            },
            getMessages(){
 
                const url = '/chat/room/'+this.currentRoom.id +'';
                       axios.get(url)
                      .then((response) => {
                        console.log("get messages response")
                        console.log(response.data)
                        this.messages = response.data;
                   
                       })
                     .catch((error) => {
                    console.log(error);
                })
                
        }
         
    },
    created() {
                this.getRooms();
            }

    }
</script>
