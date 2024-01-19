const { Sequelize } = require("sequelize");

const sequelize = new Sequelize({
  dialect: "mysql",
  host: "localhost",
  username: "root",
  password: "your_mysql_password",
  database: "hrd_database",
});

module.exports = sequelize;
