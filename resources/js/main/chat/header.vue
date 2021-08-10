<template>
    <header>
        <h1>Get the create function to work</h1>
    </header>
</template>

<script>
export default {
    name : "Header",

    methods: {
        call_(){
         console.log("inside created function");
        },
        created () {
            this.call_();
        }
    }

}
</script>

<style>
header{
    position: absolute;
    top: 0;
    left: 29px;
    margin: 15px;
    font-size: 26px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
</style>