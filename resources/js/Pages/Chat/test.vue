<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Chat</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <h1>hello world</h1>
          <!-- vue button -->
          <button @click="testajax()" class="btn btn-primary">Test</button>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },
  methods: {
    testajax() {
        console.log("attempting to hit index chat controller ...")
      axios.get("api/chat")
      .then(response => (
          console.log(response)
      ));
    },
    helloworld () {
      console.log("created function is fired up")
      // create axios post function
      axios.get("api/chat")
      .then(response => (
          console.log(response)
      ));
      
      
    },

  },
      created() {
      this.hellowrold();
    }
};
</script>

