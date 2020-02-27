<template>
  <div class="wrapper">
    <form
      :inline="true"
      :model="formInline1"
      :rules="rules1"
      @submit.prevent="requestOtp"
      class="form"
    >
      <h1>ورود/عضویت</h1>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <div label="09129955222" prop="mobno">
              <input maxlength="11" v-model="formInline1.mobno" placeholder="موبایل" />
            </div>
          </div>
        </div>
      </div>

      <br />
      <div class="form-group">
        <button class="btn btn-primary">ارسال</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      api_url: process.env.MIX_APP_URL
        ? process.env.MIX_APP_URL
        : "https://dideban.liara.run",
      formInline1: {
        mobno: ""
      },
      rules1: {
        mobno: [
          {
            required: true,
            message: "Please enter Mobile Number",
            trigger: "blur"
          },
          {
            min: 11,
            max: 11,
            message: "Length must be 10",
            trigger: "blur"
          },
          {
            trigger: "blur",
            validator(rule, value, callback) {
              if (/^[789]\d{9}$/.test(value)) {
                callback();
              } else {
                callback(
                  new Error(
                    "Mobile number must be 10 digits starting 7, 8 or 9"
                  )
                );
              }
            }
          }
        ]
      }
    };
  },
  created() {
    const jwt = localStorage.getItem("jwt");
    if (jwt) this.$router.push({ path: "/profile" });
  },
  methods: {
    requestOtp() {
      let uri = `${this.api_url}/api/v1/otp11/${this.formInline1.mobno}`;
      console.log(uri);
      this.axios.get(uri).then(response => {
        this.$router.push({
          name: "reg2",
          params: { phone: this.formInline1.mobno }
        });
      });
    }
  }
};
</script>
