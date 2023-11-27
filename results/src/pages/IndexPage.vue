<template>
  <q-page class="">
    <q-table
      title="Resultater"
      :rows="attendants.data"
      :columns="columns"
      row-key="name"
      virtual-scroll
      flat bordered
      style="height: 600px; max-height: 1200px"
      :filter="filter"
      :pagination="initialPagination"
      no-data-label="Ingen deltagere har kommet i mål ennå"
    >
      <template v-slot:top-left>

        <h6 style="margin: 6px;">Nyttårsløpet 2023 Resultater</h6>
        </template>
      <template v-slot:top-right>
        <div style="display: block">
        <q-input rounded dense outlined debounce="300" v-model="filter" placeholder="Søk...">
          <template v-slot:append>
            <q-icon name="search" />
          </template>
        </q-input>
        </div>
      </template>
    </q-table>

  </q-page>
</template>

<script>
import Axios from 'axios';
export default {

  data() {
    return {
      filter: '',
      attendants: [],
      columns: [
        {name: 'time', label: 'Tid', field: 'time', sortable: true, align: 'left'},
        {name: 'name', label: 'Navn', field: 'name', sortable: true, align: 'left'},
        {name: 'team', label: 'Lag', field: 'team', sortable: true, align: 'left'},
        {name: 'runs', label: 'Runder', field: 'runs', sortable: true, align: 'left'}
      ],
      initialPagination: {
        sortBy: 'time',
        descending: false,
        page: 1,
        rowsPerPage: 50

      },
    }
  },

  watch: {

  },

  async created() {

    const response = await Axios.get('https://nyttaarslopet.kardigan.no/attendants');

    this.attendants = response.data;
  }
}


</script>
