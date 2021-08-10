<template>
    <div  class="h-96 w-full">
       <div class="h-full p-2 flex flex-col-reverse overflow-scroll">
           <div v-for="(messag, index) in message" :key="index">
               <!--remember to change message to messages on the prop if this doesn't wokr-->
                <message-item :message="messag" />
           </div>

       </div>
    </div>
</template>
<script>
import messageItem from './messageItem.vue'

export default {
  components: { messageItem },
props: ['message']
}

</script>
