<template>
    <div class="form">
        <div class="view">
            <h1>Chat App</h1>
            <!-- v-bind p -->
            <p>
            {{test_data}}
            </p>
        </div>
        <button  @click="postRoom()" class="btn btn-primary">start</button>
    </div>
</template>

<script>
export default {

    name: 'App',
    data: function (){
        return {
            name: "Isaac Yeboah",
            test_data : ""
        }
    },
    methods: {
                getRooms(){
                console.log("getRooms..")
                axios.get('/chat/rooms')
               .then( (response) => {
             
                   console.log("chatRooms"); 
                   console.log("setRoom response" + response.data[0]);
                   this.name = Response.data;
               })
               .catch ((error) => {
                   console.log(error);
               }) 
            },

            //create a function to post the rooms
            postRoom(){
                axios.post('api/chat/store', {name: this.name})
                .then( (response) => {
                this.test_data = response;
                });

            },

            created(){
                alert("created function called..")
                this.getRooms();
            }
    }

}

</script>

<style scoped>
.form{

    width: 700px;
    background-color: rgb(93, 6, 6);
    height: 50vh;
    display: flex;
    justify-content: center;
    justify-items: center;
    margin:auto;
    margin-top:120px;
    flex-direction: column;
    justify-content: space-around;
}
.view{
    background: white;
    text-align: center;
    margin: auto;
    height: 20vh;
    width:400px;
    border-radius: 25px;
}

h1{
    font-weight: bold;
    margin-top: 10%;
}

.btn{
    padding: auto;
    margin:auto;
    width: 120px;
    height: 7vh;
    color: white;
    /* background-color: blueviolet; */
    border-radius: 25px;
}
</style>