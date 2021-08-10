<template>
    <div class="relative h-10 m-1">
        <div style="border-top: 1px solid #e6e6e6" class="grid grid-cols-6">
            <input type="text" v-model="message" class="col-span-5 outline-none p-1"
                @keyup.enter="sendMessage()" placeholder="Say something" />
            <button @click="sendMessage()"     
            class="place-self-end bg-gray-500 hover:bg-blue-700 p-1 mt-1 rounded text-white">
                Send
            </button>
        </div>
    </div>
</template>


<script>
import Input from '../../Jetstream/Input.vue';

export default {
    components: {Input },
    props: ['room'],
    data: function () {
        return {
            message: ''
        }
    
    },
    methods: {
        async sendMessage(){

            if(this.message == ''){
                // this.message = 'Please enter a message';
                console.log('Please enter a message')
                return;
            }
            console.log("sendinng")
                
                //create Posturl
                const Posturl = '/chat/roommessage/'+this.room.id +'';


                await axios.post(Posturl, {
                                        message : this.message
                                
                                })
                            .then(response => {
                                        console.log("post message controller hit")
                                        if (response.status == 201) {
                                        console.log(this.message)
                                        this.message = '';
                                       this.$emit('messagesent');
                                    }
                             })
                             .catch(error => {
                                        console.log(error)
                            })
                }
            } 

}

</script>
