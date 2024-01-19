const { validationResult } = require("express-validator");
const Pegawai = require("../models/Pegawai");

class PegawaiController {
  async getAll(req, res) {
    try {
      const dataPegawai = await Pegawai.findAll();
      return res.json(dataPegawai);
    } catch (error) {
      console.error(error);
      return res.status(500).json({ message: "Internal Server Error" });
    }
  }

  async getById(req, res) {
    const { id } = req.params;
    try {
      const pegawai = await Pegawai.findByPk(id);
      if (!pegawai) {
        return res.status(404).json({ message: "Pegawai not found" });
      }
      return res.json(pegawai);
    } catch (error) {
      console.error(error);
      return res.status(500).json({ message: "Internal Server Error" });
    }
  }

  async create(req, res) {
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
      return res.status(400).json({ errors: errors.array() });
    }

    const { nama, posisi, departemen, gaji } = req.body;
    try {
      const newPegawai = await Pegawai.create({
        nama,
        posisi,
        departemen,
        gaji,
      });
      return res.status(201).json(newPegawai);
    } catch (error) {
      console.error(error);
      return res.status(500).json({ message: "Internal Server Error" });
    }
  }

  async update(req, res) {
    const { id } = req.params;
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
      return res.status(400).json({ errors: errors.array() });
    }

    try {
      const pegawai = await Pegawai.findByPk(id);
      if (!pegawai) {
        return res.status(404).json({ message: "Pegawai not found" });
      }

      const { nama, posisi, departemen, gaji } = req.body;
      pegawai.nama = nama;
      pegawai.posisi = posisi;
      pegawai.departemen = departemen;
      pegawai.gaji = gaji;

      await pegawai.save();
      return res.json(pegawai);
    } catch (error) {
      console.error(error);
      return res.status(500).json({ message: "Internal Server Error" });
    }
  }

  async delete(req, res) {
    const { id } = req.params;
    try {
      const pegawai = await Pegawai.findByPk(id);
      if (!pegawai) {
        return res.status(404).json({ message: "Pegawai not found" });
      }

      await pegawai.destroy();
      return res.json({ message: "Pegawai deleted successfully" });
    } catch (error) {
      console.error(error);
      return res.status(500).json({ message: "Internal Server Error" });
    }
  }
}

module.exports = new PegawaiController();
