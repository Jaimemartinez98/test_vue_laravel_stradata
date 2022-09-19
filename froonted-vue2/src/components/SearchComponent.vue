<template>
  <v-app>
    <h1 class="mt-8 text-center">Busqueda de usuarios</h1>
           <v-btn :to="{path: '/list-search' }" class="light-green"  style="width: 25%; float: right;" >Busquedas realizadas </v-btn>

     <v-row justify="center" class="my-6 d-flex py-4">
            <form @submit.prevent="crear">
              <v-container bg fill-height>
                <v-col class="mx-10 ">
                  <v-text-field
                    v-model="search.name"
                    class="form-control"
                    label="Nombre de la busqueda"
                    required
                    solo
                  ></v-text-field>
                  <v-text-field
                    v-model="search.percent"
                    class="form-control"
                    label="Porcentaje de exactitud"
                    required
                    solo
                  ></v-text-field>
                  <v-btn type="submit" block class="cyan darken-1">
                    <span class="white--text">Enviar</span>
                  </v-btn>
                </v-col>
                
              </v-container>
            </form>
          </v-row>


    <v-row justify="center" class="mx-8 my-8 d-flex pb-4">
      <v-simple-table>
        <template v-slot:default>
         
          <thead>
            <tr class="cyan accent-4">
              <th
                class="
                  text-left
                  font-weight-black
                  white--text
                  text-md-body-1
                  px-6
                "
              >Nombre</th>
              <th
                class="
                  text-left
                  font-weight-black
                  white--text
                  text-md-body-1
                  px-6
                "
              >
                Tipo de persona
              </th>
              <th
                class="
                  text-left
                  font-weight-black
                  white--text
                  text-md-body-1
                  px-6
                "
              >
                Tipo de cargo
              </th>
              <th
                class="
                  text-left
                  font-weight-black
                  white--text
                  text-md-body-1
                  px-6
                "
              >
                Departamento
              </th>
              <th
                class="
                  text-left
                  font-weight-black
                  white--text
                  text-md-body-1
                  px-6
                "
              >
                Municipio
              </th>
              <th
                class="
                  text-left
                  font-weight-black
                  white--text
                  text-md-body-1
                  px-6
                "
              >
                % Coincidencia
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="answer in answer" :key="answer.id">
              <td class="text-left px-6">{{ answer.name }}</td>
              <td class="text-left px-6">{{ answer.type }}</td>
              <td class="text-left px-6">{{ answer.charge }}</td>
              <td class="text-left px-6">{{ answer.province }}</td>
              <td class="text-left px-6">{{ answer.city }}</td>
              <td class="text-left px-6">{{ answer.similarity }}</td>

            </tr>
          </tbody>
        </template>
      </v-simple-table>
    </v-row>
  </v-app>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      answer: [],
      search: {
        name: "",
        percent: "",
      },
    };
  },
  mounted() {},

  methods: {
    crear() {
     this.answer = "";     
      let apiURL = "http://127.0.0.1:8000/api/search/";

      axios
        .post(apiURL, this.search)
        .then((response) => {
          console.log(response);
          alert("¡Se ha hecho la busqueda correctamente!");
          this.answer = response.data;          
        })
        .catch((e) => {
          console.log(e);
          this.errors.push(e);
        });
    },
  },
};
</script>

