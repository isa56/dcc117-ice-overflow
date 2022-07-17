<template>
  <div class="teste1 items-center bg-background flex justify-center">
    <div class="bloco-central bg-background-dark text-white rounded-lg px-36 py-12">
      <h1 class="text-style text-white font-bold text-4xl mb-8 text-center">
        CRIAR UM NOVO POST
      </h1>

      <form method="POST" class="form-style w-100" @submit.prevent="checkForm">

        <input class="title-style rounded mb-3 px-2 py-3 w-full bg-white text-background-dark" type="text"
          placeholder="Título" v-model="title" />
        <textarea class="desc-style rounded mb-3 px-2 py-3 w-full bg-white text-background-dark" rows="5" cols="30"
          type="text" placeholder="Descrição" v-model="text"></textarea>
        <br>
        <div>

        <input type="text" class="filter-style px-4 py-2" placeholder="Disciplina" autocomplete="off" v-model="subject" @input="filterSubjects" @focus="modal=true"/>

          <div v-if="filteredSubjects && modal"> 
            <ul class="lista-ul-style" style="width: 220px; height: 150px; overflow: auto">
              <li class="lista-li-style" v-for="filteredSubject in filteredSubjects" :key="filteredSubject" @click="setSubject(filteredSubject)">{{ filteredSubject }} </li>
            </ul>
          </div>

        </div>
        <div class="flex justify-center">
          <input
            class=" input font-medium send-button px-12 py-2 w-50 h-18 mb-3 text-background-dark rounded bg-primary text-2xl mt-2"
            type="submit" value="ENVIAR" @click="checkForm" />
          <br>
        </div>


        <v-alert class="alert-style alert-erro-style" type="error">
          {{ errors[0] }}
          <br>
          {{ errors[1] }}
          <br>
          {{ errors[2] }}
        </v-alert>

      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "CreatePost",
  components: {},

  data() {
    return {
      errors: [],
      title: null,
      text: null,
      archive: null,
      modal: false,
      subject: '',
      subjects: [
        'Cálculo 1', 'Física 1', 'Algoritmos', 'Estrutura de Dados 1', 'Algoritmos' , 'Algoritmos', 'Algoritmos', 'Algoritmos', 'Algoritmos', 'Algoritmos', 'Algoritmos', 'Algoritmos', 'Algoritmos' 
      ],
      filteredSubjects: [],
    }
  },

  mounted(){
    this.filterSubjects();
  },

  methods: {

    checkForm: function (e) {
      var titleStyle = document.querySelector(".title-style");
      var descStyle = document.querySelector(".desc-style");
      var filterStyle = document.querySelector(".filter-style");
      var alertStyle = document.querySelector(".alert-style");
      titleStyle.classList.remove("erro-form-style");
      descStyle.classList.remove("erro-form-style");
      filterStyle.classList.remove("erro-form-style");
      alertStyle.classList.add("alert-erro-style");
      this.errors = [];


      var validationSubject = false;
      if(this.subject.length == 0){
        this.subject = '';
        validationSubject = true;
      }
      else
      {
        validationSubject = false;
        for(var i = 0; i < this.subjects.length; i++)
        {
          if(this.subject == this.subjects[i])
          {
            validationSubject = true;
          }
        }

        if(!validationSubject)
        {
          this.errors.push('Disciplina não encontrada.');
          filterStyle.classList.add("erro-form-style");
          alertStyle.classList.remove("alert-erro-style");
          alertStyle.classList.add("error-style");
        }

      }

      if (this.title && this.text && validationSubject) {
        return true;
      }

      if (!this.title) {
        this.errors.push('O Título é obrigatório.');
        titleStyle.classList.add("erro-form-style");
        alertStyle.classList.remove("alert-erro-style");
        alertStyle.classList.add("error-style");
      }
      if (!this.text) {
        this.errors.push('A Descrição é obrigatória.');
        descStyle.classList.add("erro-form-style");
        alertStyle.classList.remove("alert-erro-style");
        alertStyle.classList.add("error-style");
      }
      
      e.preventDefault();
    },

    filterSubjects(){
      if(this.subject.length == 0){
        this.filteredSubjects = this.subjects;
      }

      this.filteredSubjects = this.subjects.filter(subject => {
        return subject.toLowerCase().startsWith(this.subject.toLowerCase());
      });
    },

    setSubject(subject){
      this.subject = subject;
      this.modal = false;
    },

  },


}

</script>

<style scoped>
.alert-erro-style {
  display: none;
}

.error-style {
  background-color: rgb(185, 67, 67);
}

.erro-form-style {
  border: 2px solid red;
}

.input-file[type="file"] {
  display: none;
}

.li-style {
  color: rgb(185, 67, 67);
}

.lista-style {
  width: 50%;
  background-color: white;

}

.bloco-central {
  max-height: 38rem;
  margin: 2.5rem 2.5rem 2.5rem 2.5rem;
}

.filter-style {
  background-color: white;
  color: black;
  border-radius: 5px;
  margin-bottom: 15px;
}

.lista-li-style {
  color: black;
  background-color: white;
}
.lista-li-style:hover {
  background-color: #6BBBB5;
}

.lista-ul-style {
  border-radius: 5px;
}


@media (max-width: 530px) {
  .bloco-central {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    min-width: 15rem;
    margin-bottom: 5rem;
  }
  .form-style {
    min-width: 15rem;
  }
  .text-style {
    min-width: 15rem;
  }

}
</style>
