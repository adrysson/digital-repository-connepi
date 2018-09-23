<template>
  <div class="index">
    <v-app light>
      <v-toolbar color="#aa2e25" dark tabs>
        <v-toolbar-title>RDIA</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items>
          <v-btn icon title="Página inicial">
            <v-icon>mdi-login-variant</v-icon>
          </v-btn>
          <v-btn icon title="Página inicial">
            <v-icon>cloud_upload</v-icon>
          </v-btn>
        </v-toolbar-items>
        <v-menu offset-y>
          <v-icon slot="activator" icon>mdi-dots-vertical</v-icon>
          <v-list>
            <v-list-tile v-for="(item, index) in menu" :key="index" @click="">
              <v-list-tile-title><v-icon>{{item.icon}}</v-icon> {{ item.title }}</v-list-tile-title>
            </v-list-tile>
          </v-list>
        </v-menu>
      </v-toolbar>
      <v-content>
        <section>
          <v-parallax :src="require('@/assets/hero.jpeg')" height="600">
            <v-layout
            column
            align-center
            justify-center
            class="white--text"
            >
            <h1 class="white--text mb-2 display-1 text-xs-center" v-text="project.title"></h1>
            <div class="subheading mb-3 text-xs-center" v-text="project.subtitle"></div>
            <v-card>
              <v-form>
                <v-card-actions class="pesquisa-termo">
                  <div class="pesquisa-termo-input">
                    <v-text-field
                    label="Informe um termo"
                    color="red"
                    required
                    ></v-text-field>
                  </div>
                  <div class="pesquisa-termo-input">
                    <v-btn
                    class="red lighten-2"
                    dark
                    large
                    >
                    Pesquisar
                  </v-btn>
                </div>
              </v-card-actions>
            </v-form>
          </v-card>
        </v-layout>
      </v-parallax>
    </section>
    <v-footer class="red darken-2">
      <v-layout row wrap align-center>
        <v-flex xs12>
          <div class="white--text ml-3">
            {{project.title}}{{project.year}}. Desenvolvido por <a v-for="dev in project.devs" class="white--text" :href="dev.link" target="_blank">{{dev.name}}</a>
          </div>
        </v-flex>
      </v-layout>
    </v-footer>
  </v-content>
</v-app>
</div>
</template>

<script>
export default {
  name: 'index',
  data () {
    return {
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
.pesquisa-termo div.pesquisa-termo-input{
  padding: 5px
}
</style>
