<template>
    <div class="grid grid-cols-2">
        <!-- create class font bold text xl-->
        <div class="font-bold text-xl">
            {{ selected.name }} Chat
        </div>
       <div>
           <select 
                v-model="selected"
                @change="$emit('roomchange', selected)"
                class="float-right">
                <option
                    v-for="(room, index) in rooms"
                    :key="index" :value="room">
                    {{ room.name }}
                </option>
           </select>
       </div>
    </div>
</template>
<script>

export default {
    props:['rooms', 'currentRoom'],

    data: function () {
        return {
            selected: ''
        }
    },
    created() {
        this.selected = this.currentRoom;
    }
}


</script>
