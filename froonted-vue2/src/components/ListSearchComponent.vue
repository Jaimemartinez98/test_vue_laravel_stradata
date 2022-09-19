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
                UUID 
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
                Nombre Buscado
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
                Porcentaje de exactitud minimo
              </th>
              <th
                class="
                  text-center
                  font-weight-black
                  white--text
                  text-md-body-1
                  px-6
                "
              >
                Acciones
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="search in searches" :key="search.id">
              <td class="text-left px-6">{{ search.id }}</td>
              <td class="text-left px-6">{{ search.name }}</td>
              <td class="text-left px-6">{{ search.percent }}</td>
              <td>
                <v-btn
                  :to="{ path: '/view-search/' + search.id }"
                  class="light-blue lighten-3 mx-1"
                  x-small
                  >Ver resultados
                </v-btn>
              </td>
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
      searches: [],
    };
  },
  mounted() {
    this.showSearches();
  },
  methods: {
    showSearches() {
      let apiURL = "http://127.0.0.1:8000/api/search-all";
      axios
        .get(apiURL)
        .then((res) => {
            console.log(res);
          this.searches = res.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>