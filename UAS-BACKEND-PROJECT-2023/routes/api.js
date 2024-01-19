const express = require("express");
const { body } = require("express-validator");
const jwt = require("jsonwebtoken");
const PegawaiController = require("../controllers/PegawaiController");
const router = express.Router();

const authenticateToken = (req, res, next) => {
  const token = req.header("Authorization");
  if (!token) return res.status(401).json({ message: "Unauthorized" });

  jwt.verify(token, process.env.JWT_SECRET, (err, user) => {
    if (err) return res.status(403).json({ message: "Forbidden" });
    req.user = user;
    next();
  });
};

router.get("/pegawai", PegawaiController.getAll);
router.get("/pegawai/:id", PegawaiController.getById);
router.post(
  "/pegawai",
  [
    authenticateToken,
    body("nama").notEmpty(),
    body("posisi").notEmpty(),
    body("departemen").notEmpty(),
    body("gaji").notEmpty().isFloat(),
  ],
  PegawaiController.create
);
router.put(
  "/pegawai/:id",
  [
    authenticateToken,
    body("nama").notEmpty(),
    body("posisi").notEmpty(),
    body("departemen").notEmpty(),
    body("gaji").notEmpty().isFloat(),
  ],
  PegawaiController.update
);
router.delete("/pegawai/:id", authenticateToken, PegawaiController.delete);

module.exports = router;
