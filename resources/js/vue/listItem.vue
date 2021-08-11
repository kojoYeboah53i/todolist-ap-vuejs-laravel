<template>
  <div class="item">
    <p>
      <input id="checkbox" type="checkbox" @change="updateCheck()" v-model="item.completed" true-value="1" false-value="0"/>
      <span :class="[item.completed ? 'completed' : '', 'item-text']">
        {{ item.name }}
      </span>
    </p>
    <button @click="removeItem()" class="trashcan">
      <font-awesome-icon icon="trash" />
    </button>
  </div>
</template>

<script>
export default {
  props: ["item"],
  methods: {
    updateCheck() {
      axios.put("./api/item/" + this.item.id, {
          item: this.item,
        })
        .then((response) => {
          if (response.status == 200) {
            this.$emit("itemchanged");
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    removeItem() {
      axios.delete("./api/item/" + this.item.id)
        .then((response) => {
          if (response.status == 200) {
            this.$emit("itemchanged");
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style scoped>
.completed {
  text-decoration: line-through;
  color: #999999;
}
.itemText {
  width: 100%;
  margin-left: 30px;
}
.item {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.trashcan {
  background: #062723;
  border: none;
  color: #ff0000;
  outline: none;
  cursor: pointer;
  font-size: 1.7rem;
}
 input#checkbox {
   font-size: 1.7rem;
   margin-right: 5px;
}
p {
  margin: 0;
}
</style>