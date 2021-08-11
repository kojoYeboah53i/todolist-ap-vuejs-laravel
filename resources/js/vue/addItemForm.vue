<template>
  <div class="addItem">
    <input type="text" v-model="item.name"/>
    <font-awesome-icon icon="plus-square" @click="addItem()" :class="[item.name ? 'active' : 'inactive', 'plus']" />
  </div>
</template>

<script>
export default {
  data() {
    return {
      item: {
        name: "",
      },
    };
  },
  methods: {
    addItem() {
      if (this.item.name == "") {
          console.log("noting entered")
            this.item.name = "Please enter something";
        return;
      }
      axios.post("./api/item/store", {
          item: this.item,
        })
        .then((response) => {
          if (response.status = 201) {
            this.item.name = "";
          }
          this.$emit("reloadlist")
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style scoped>
.addItem {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 20px;
  margin-top: 20px;

  
}
input {
  border: 0;
  outline: none;
  padding: 5px;
  margin-right: 6px;
  width: 90%;
  min-height: 7vh;
  border-radius: 5px;
  font-size: 1.6rem;
  border: none;
  background: white;
}
.plus {
    font-size:2rem ;
    /* display:none; */
}

.active {
  color: #00ce25;
  cursor: pointer;
}
.inactive {
  color: #999999;
}
</style>