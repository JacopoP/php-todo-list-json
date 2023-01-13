<script>
import axios from 'axios';
const APIServer = 'http://localhost/';
export default {
  data() {
    return {
      toDoList: [],
      newTask: '',
    }
  },
  methods: {
    getData: function () {
      axios.get(APIServer + 'sendDataApi.php')
        .then((res) => { this.toDoList = res.data }
        );
    },
    addTask: function (e) {
      e.preventDefault();
      if (this.newTask.length > 0) {
        const params = {
          'task': this.newTask,
        };
        axios.get(APIServer + 'addTaskApi.php', { params })
          .then(() => {
            this.getData();
            this.newTask = '';
          })
      }
    }
  },

  mounted() {
    this.getData();
  }
}
</script>

<template>
  <h1>To Do List</h1>
  <form @submit="addTask">
    <input type="text" name="newTask" v-model="this.newTask">
    <input type="submit" value="Crea task">
  </form>
  <ul>
    <li v-for="(task, index) in this.toDoList" :class="{ 'done': task.done }" :key="index">{{ task.text }}</li>
  </ul>
</template>

<style>
.done {
  text-decoration: line-through;
}
</style>
