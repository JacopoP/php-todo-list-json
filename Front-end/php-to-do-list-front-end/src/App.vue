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
    },

    changeTaskState: function (n) {
      const params = {
        'task': n,
      }
      axios.get((APIServer + 'changeTaskState.php'), { params })
        .then(() => { this.getData() })
    },
    delateTask: function (n) {
      const params = {
        'task': n,
      }
      axios.get((APIServer + 'delTask.php'), { params })
        .then(() => { this.getData() })
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
    <li v-for="(task, index) in this.toDoList" :class="{ 'done': task.done }" :key="index"
      @click="this.changeTaskState(index)">
      {{ task.text }}
      <div class="trash" @click="delateTask(index)"><font-awesome-icon icon="fa-solid fa-trash" /></div>
    </li>
  </ul>
  <form @submit="addTask">
    <input type="text" name="newTask" v-model="this.newTask" placeholder="Scrivi qua la task da aggiungere">
    <input type="submit" value="Crea task">
  </form>
</template>

<style lang="scss">
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background-color: #001632;
  font-family: Arial, Helvetica, sans-serif;

  h1 {
    text-align: center;
    color: #fff;
    margin-top: 50px;
    font-size: 2.5rem;
  }

  ul {
    background-color: #fff;
    width: 500px;
    margin: 50px auto;
    list-style: none;
    border-radius: 10px;
    padding: 0;

    li {
      width: 100%;
      padding: 15px;
      cursor: pointer;
      border: 1px solid #001632;
      font-size: 1.2rem;
      position: relative;

      &.done {
        text-decoration: line-through;
      }

      .trash {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translate(0, -50%);
        aspect-ratio: 14/16;
        height: calc(100% - 20px);
        background-color: red;
        color: #fff;
        cursor: pointer;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;

        &:hover {
          color: #000;
          background-color: #ff3f3f;
        }
      }
    }
  }

  form {
    margin: 0 auto;
    width: 500px;
    border-radius: 10px;
    overflow: hidden;

    input[type='text'] {
      width: calc(100% - 100px);
      font-size: 1.2rem;
      padding: 15px;
    }

    input[type='submit'] {
      width: 100px;
      padding: 15px 0;
      font-size: 1.2rem;
      cursor: pointer;
      border-radius: 0 10px 10px 0;
      background: transparent;
      border: 1px solid #fff;
      color: #fff;

      &:hover {
        background-color: #000000;
      }
    }
  }
}
</style>
