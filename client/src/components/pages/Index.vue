<template>
  <div>
    <v-layout column align-center justify-center>
      <h1 class="white--text mb-2 display-1 text-xs-center" v-text="$project.title"></h1>
      <div class="subheading mb-3 text-xs-center" v-text="$project.subtitle"></div>
    </v-layout>
    <v-layout row wrap align-center justify-center>
      <v-flex xs8>
        <v-card id="card-search-article">
          <v-form>
            <v-card-text>
              <v-text-field label="Informe um termo para pesquisar" color="red" required></v-text-field>
            </v-card-text>
          </v-form>
        </v-card>
      </v-flex>
    </v-layout>
    <v-layout row wrap align-center justify-center>
      <v-btn class="red lighten-2" dark large>
        Pesquisar
      </v-btn>
    </v-layout>
  </div>
</template>

<script>
export default {
}
</script>

<style lang="css">
</style>

<script>
export default {
  name: 'index'
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
</style>
