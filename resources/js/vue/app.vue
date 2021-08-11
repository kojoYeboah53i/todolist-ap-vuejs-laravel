<template>
  <nav />
  <h1 id="title">Add Todo List</h1>

  <div class="todoListContainer">
    <div class="heading">
      <add-item-form @reloadlist="getList()" />
    </div>
    <list-view :items="items" @reloadlist="getList()" />
  </div>
</template>

<script>
import addItemForm from "./addItemForm";
import listView from "./listView";
import nav from "./nav";

export default {
  components: {
    addItemForm,
    listView,
    nav,
  },
  data() {
    return {
      items: [],
    };
  },
  methods: {
    getList() {
      axios
        .get("./api/items")
        .then((response) => {
          this.items = response.data;
          console.log(response);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created() {
    this.getList();
  },
};
</script>

<style scoped>
.todoListContainer {
  text-align: center;
  width: 350px;
  margin: auto;
  position: relative;
  top: 10px;
  border-radius: 35px;
  box-shadow: 0 2px 10px 1px rgba(44, 39, 39, 0.3);
}
.heading {
  background: #e6e6e6;
  padding: 10px;
  border-radius: 35px 35px 0 0;
  background: #062723;
}
#title {
  margin-top: 100px;
  margin-bottom: 0;
  text-align: center;
}
</style>
