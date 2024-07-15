import mongoose from "mongoose"
import express, { urlencoded } from "express"
import { router } from "./routes/dashboard.js"
import cors from 'cors'
import dotenv from "dotenv"
dotenv.config()

const app = express()
app.use(express.json())
app.use(cors())
app.use(urlencoded({ extended: true }))


app.use('/', router)


const PORT = process.env.PORT || 3000
const DB_URI = process.env.MONGODB_URI

mongoose.connect(DB_URI)
  .then(() => { console.log('connected MongoDB successfully!') })
  .catch(err => console.log(err))

app.listen(PORT, () => {
  console.log(`server is listening at port ${PORT}`);
})

