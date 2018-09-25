<template>
  <div>
    <v-layout column align-center justify-center>
      <h1>Submissão de publicação</h1>
    </v-layout>
    <v-container>
      <v-layout row wrap align-center justify-center>
        <v-flex xs10>
          <v-card>
            <v-card-text>
              <v-form v-model="valid" ref="form" lazy-validation>
                <v-layout row wrap>
                  <v-flex md12>
                    <v-text-field label="Título" required color="red darken-2"></v-text-field>
                  </v-flex>
                  <v-flex md6>
                    <v-text-field label="Autores" required color="red darken-2" placeholder="Digite os nomes separados por vírgula"></v-text-field>
                  </v-flex>
                  <v-flex md6>
                    <v-text-field label="Palavras chave" required color="red darken-2" placeholder="Digite os nomes separados por vírgula"></v-text-field>
                  </v-flex>
                  <v-text-field label="E-mail" v-model="email" :rules="emailRules" required></v-text-field>
                  <v-select label="Item" v-model="select" :items="items" :rules="[v => !!v || 'Item is required']" required></v-select>
                  <v-checkbox label="Do you agree?" v-model="checkbox" :rules="[v => !!v || 'You must agree to continue!']" required></v-checkbox>
                </v-layout>
              </v-form>
            </v-card-text>
            <v-card-actions>
              <v-btn @click="submit" :disabled="!valid">submit</v-btn>
              <v-btn @click="clear">clear</v-btn>
            </v-card-actions>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
export default {
  name: 'submissao',
  data () {
    return {
      alert: true,
      project: {
        title: 'RDIA',
        subtitle: 'Repositório Digital CONNEPI',
        year: '\u00A92018',
        devs: [
          {
            name: 'Adrysson',
            link: 'https://github.com/adrysson'
          }
        ]
      },
      menu: [
        { title: 'Página inicial', icon: 'home' },
        { title: 'Sobre o CONNEPI', icon: 'info' },
        { title: 'Comunidades e coleções', icon: 'group' },
        { title: 'Downloads', icon: 'cloud_download' },
        { title: 'Estatísticas', icon: 'mdi-chart-line' }
      ]
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
</style>
