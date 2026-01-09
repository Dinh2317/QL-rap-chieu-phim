import axios from "axios";
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ position: "top-right" });
export default function (to, from, next) {
  var noi_dung = localStorage.getItem("key_client");
  axios
    .get("http://127.0.0.1:8000/api/checkclient", {
      headers: {
        Authorization: "Bearer " + noi_dung,
      },
    })
    .then((res) => {
      if (res.data.status) {
        localStorage.setItem("ho_va_ten", res.data.ho_ten);
        next();
      } else {
        toaster.error(res.data.message);
        next("/client/dang-nhap");
      }
    });
}
