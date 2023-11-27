<script>
import {Form, Field, CellGroup, showConfirmDialog} from 'vant';
import Axios from 'axios';
import axios from "axios";
import Header from "../components/header.vue";

export default {
  name: "register",

  data() {
    return {
      show_time_picker: false,
      time_fields: ['hour', 'minute', 'second'],
      registration: {
        name: "",
        team: "",
        runs: 1,
        time: "00:00:00", //["00", "00", "00"],
        tc_accepted: false,
        mobile: ""
      }
    }
  },

  methods: {
    onConfirmTime({selectedValues}) {
      this.registration.time = selectedValues.join(':');
      this.show_time_picker = false;
    },

    timeFormatter(type, option) {
        if (type === 'hour') {
          option.text += 't';
        }
        if (type === 'minute') {
          option.text += 'm';
        }
        if(type === 'second') {
          option.text += 's';
        }
        return option;
    },

    validate() {
      if(this.registration.name === "") {

        return false;
      }

      if(this.registration.runs <= 0) {
        return false;
      }

      if(this.registration.time === "00:00:00") {
        return false;
      }

      if(!this.registration.tc_accepted) {
        return false;
      }
    },

    async register() {
      if(!this.validate()) {
        return false;
      }

      const response = await axios.post('https://nyttaarslopet.kardigan.no/attendants', this.registration);
      if(response.data.hasOwnProperty('status') && response.data.status === "success") {
        this.$router.push('/takk');
      }
    },

    showTc() {
      showConfirmDialog({
        title: 'Vilkår',
        message: 'Jeg godtar at min informasjon publiseres på f-b.no, jeg godttar også at mitt telefonnummer kan lagres for fremtidig bruk av Idyllfestivalen mtp promotering',
        cancelButtonText: "Avbryt",
        confirmButtonText: "Godta",
        theme: "default",
        className: "tcDialog"
      }).then(() => {
        this.registration.tc_accepted = true;
      }).catch(() => {
        this.registration.tc_accepted = false;
      });
    }



  },

  components: {
    Form, Field, CellGroup,
    Header,
  }
}
</script>

<template>

  <Header></Header>

  <h4>Registrer deg</h4>

  <van-form @submit="register" id="register-form">
    <van-cell-group inset>
      <van-field
          v-model="registration.name"
          name="Navn"
          label="Navn"
          placeholder="Ditt navn..."
          :rules="[{ required: true, message: 'Navn er påkrevd' }]"
      />

      <van-field
          v-model="registration.mobile"
          name="Mobil"
          label="Mobil"
          placeholder="Ditt mobilnummer.."
          :rules="[{ required: false }]"
      />

      <van-field
          v-model="registration.team"
          name="team"
          label="Skole/Idrettslag/Bedrift"
          placeholder="Din skole/idrettslag/bedrift.."
          :rules="[{ required: false }]"
          style="display: flex; flex-direction: column;"
      />

      <van-field name="runs" label="Runder">
        <template #input>

          <van-stepper v-model="registration.runs" step="1" theme="round" integer></van-stepper>
        </template>
      </van-field>

      <van-field
          v-model="registration.time"
          is-link
          readonly
          name="time"
          label="Tid"
          placeholder="Din tid"
          @click="show_time_picker = true"
          :rules="[{ required: true, message: 'Tidsforbruk er påkrevd' }]"
      />
      <van-popup v-model:show="show_time_picker" position="bottom">
      <van-time-picker
          @confirm="onConfirmTime"
          @cancel="show_time_picker = false"
          title="Din tid"
          :columns-type="time_fields"
          cancel-button-text="Avbryt"
          confirm-button-text="Lagre"
          :formatter="timeFormatter"
      >
      </van-time-picker>
      </van-popup>



      <van-field name="tc" label="Vilkår"
                 :rules="[{ required: true, message: 'Du må godkjenne vilkårende for å kunne registrere ditt løp' }]"
      >
        <template #input>
          <van-checkbox v-model="registration.tc_accepted" shape="square"/>
          <a @click="showTc" style="margin-left: 15px">Vilkår</a>
        </template>
      </van-field>
    </van-cell-group>


    <van-action-bar style="margin-bottom: 15px; justify-content: center;">
      <router-link to="/" style="font-size: 0.8em; color: #888888; margin-left: 25px; margin-right: 25px; max-width: 65px;">Avbryt</router-link>
      <van-action-bar-button type="primary" color="#2D76A2" text="Lagre ditt løp" native-type="submit" @click="register" style="max-width: 300px;"/>
    </van-action-bar>

  </van-form>


</template>

<style>

.van-dialog {
  padding: 15px
}

.van-dialog__footer {
  margin-top: 12px;
  display: flex;
  column-gap: 50px;
}

.van-dialog__footer button {
  flex: auto;
}

.tcDialog .van-dialog__header {
  font-weight: bold;
}

.van-field__label {
  word-wrap: normal;
}

</style>