<template>
  <v-app>
    <h1 class="mt-8 text-center">Listado de busquedas</h1>

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
              >
                Nombre
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
    };
  },
  mounted() {
    this.showSearches();
  },
  methods: {
    showSearches() {
      let apiURL = `http://127.0.0.1:8000/api/view-search/${this.$route.params.id}`;
      axios
        .get(apiURL)
        .then((res) => {
          console.log(res);
          this.answer = res.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>