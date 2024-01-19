const { DataTypes } = require('sequelize');
const sequelize = require('../config/database');

const Pegawai = sequelize.define('Pegawai', {
  id: {
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true,
  },
  nama: {
    type: DataTypes.STRING,
    allowNull: false,
  },
  posisi: {
    type: DataTypes.STRING,
    allowNull: false,
  },
  departemen: {
    type: DataTypes.STRING,
    allowNull: false,
  },
  gaji: {
    type: DataTypes.FLOAT,
    allowNull: false,
  },
});

module.exports = Pegawai;
