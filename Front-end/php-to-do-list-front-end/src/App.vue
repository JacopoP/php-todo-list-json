<script>
import axios from 'axios';
const APIServer = 'http://localhost/';
export default {
  data() {
    return {
      toDoList: [],
    }
  },
  methods: {
    getData: function () {
      axios.get(APIServer + 'sendDataApi.php')
        .then((res) => { this.toDoList = res.data }
        );
    }
  },

  mounted() {
    this.getData();
  }
}
</script>

<template>
  <h1>To Do List</h1>
  <ul>
    <li v-for="task in this.toDoList" :class="{ 'done': task.done }">{{ task.text }}</li>
  </ul>
</template>

<style>
.done {
  text-decoration: line-through;
}
</style>
