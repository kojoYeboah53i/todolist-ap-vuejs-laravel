<template>
<div class="container">
    <Header/>

    <div class="main">
      <div class="welcome">
        <h2>Created function response</h2>
            <button @click="return_()"> call</button>
      </div>
        <h4>username : {{ result.name }}</h4>
    </div>
</div>

</template>

<script>

import Header from "./header";
import axios from 'axios';

export default {
    name: 'Container',
    components: {
        Header
    },
    props: ["results"],
    data () {
        return {
            result : []
        }
    },

    methods: {
        return_() {
            console.log("start")
            this.result = {
                name : "Isaac Yeboah",
                stack : "web dev"
            }

            // axios.get(`./chat/room/1/messages`)
            axios.get(`./api/chat/special/1`)
            .then(response =>{
                console.log(response)
            })
            .catch(error =>{
                console.log(error)
            })
        },

    
    },
    created() {
    this.return_();
    }
}
</script>


<style scoped>

div .main{
    width: 600px;
    height: 40vh;
    padding: 5px;
    margin: auto;
    background: #eee;
    display: flex;
    justify-content: center;
    justify-items: center;
    flex-direction: column;
    position: relative;
    top: 100px;
    /* justify-content: space-between; */
}
    .welcome{
        position:absolute;
        top: 0;
        left: 0;
    }

h1, h2{
    text-decoration: none;
    font-size: 22px;
}

/** button style */
button{
    width: 80px;
    height: 7.8vh;
    padding: 2px;
    background: olivedrab;
    border-radius: 20px;
    margin: 4px;
}
</style>