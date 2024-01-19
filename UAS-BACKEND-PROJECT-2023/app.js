const express = require("express");
const morgan = require("morgan");
const cors = require("cors");
const pegawaiRoutes = require("./routes/api");
const sequelize = require("./config/database");

const app = express();

app.use(express.json());
app.use(cors());
app.use(morgan("combined"));

app.use("/", api);

const PORT = process.env.PORT || 3000;

sequelize.sync({ force: false }).then(() => {
  app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
  });
});
