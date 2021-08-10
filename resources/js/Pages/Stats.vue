<template>
<div>
  {{some}}
</div>
</template>

<script>
export default {
  name: "Stats",
  data() {
    return {
      some: "something",
    };
  },
  methods: {
    makeRequest() {
      let config = {
        headers: {
          Accept: "application/json, text/plain, */*",
          "X-Requested-With": "XMLHttpRequest",
          Connection: "keep-alive",
          "User-Agent": "axios/0.21.1",
          "X-Auth-Token": process.env.TOKEN,
        },
      };
      //axios get request
      // const getUrl = "https://api.openweathermap.org/data/2.5/weather?q=London,uk&appid=b1b15e88fa797225412429c1c50c122a1";


      const getUrl = "http://api.football-data.org/v2/competitions/";

      axios
        .get(getUrl, config)
        .then((response) => {
          // return (stats = response.data);
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    created() {
        this.makeRequest();
    },
  },
};
</script>