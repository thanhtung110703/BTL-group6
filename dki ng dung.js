npm install bcryptjs

const mongoose = require('mongoose');
const bcrypt = require('bcryptjs');

// Dinh nghia schema cho nguoi dung
const userSchema = new mongoose.Schema({
  name: { type: String, required: true },
  email: { type: String, required: true, unique: true }, // Email la duy nhat
  password: { type: String, required: true }, // Mat khau (se ma hoa truoc khi luu vao DB)
  isAdmin: { type: Boolean, default: false }, // Co admin (de phan biet nguoi quan tri)
});

// Ma hoa mat khau truoc khi luu vao DB
userSchema.pre('save', async function (next) {
  if (!this.isModified('password')) {
    return next(); // Neu mat khau khong thay doi thi khong can ma hoa lai
  }
  const salt = await bcrypt.genSalt(10);
  this.password = await bcrypt.hash(this.password, salt);
  next();
});

// Tao model User tu schema
const User = mongoose.model('User', userSchema);

module.exports = User;

const express = require('express');
const bcrypt = require('bcryptjs');
const User = require('../models/User');
const router = express.Router();

// Route dang ky nguoi dung
router.post('/register', async (req, res) => {
  const { name, email, password } = req.body;

  try {
    // Kiem tra xem nguoi dung da ton tai chua
    const existingUser = await User.findOne({ email });
    if (existingUser) {
      return res.status(400).json({ message: 'Email is already registered' });
    }

    // Tao nguoi dung moi
    const user = new User({ name, email, password });

    // Luu nguoi dung vao co so du lieu
    const newUser = await user.save();
    res.status(201).json({
      message: 'User registered successfully',
      user: {
        id: newUser._id,
        name: newUser.name,
        email: newUser.email,
      },
    });
  } catch (err) {
    res.status(500).json({ message: err.message });
  }
});

module.exports = router;

const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');
require('dotenv').config();

const app = express();

// Middleware
app.use(bodyParser.json());

// Routes
const userRoutes = require('./routes/userRoutes');
app.use('/api/users', userRoutes);

// Connect to MongoDB
mongoose.connect(process.env.MONGO_URI, { useNewUrlParser: true, useUnifiedTopology: true })
  .then(() => console.log('MongoDB connected'))
  .catch((err) => console.log(err));

// Start server
const PORT = process.env.PORT || 5000;
app.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`);
});
