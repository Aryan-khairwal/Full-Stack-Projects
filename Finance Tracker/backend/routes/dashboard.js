import { Router } from "express"
import financialRecord from "../models/financialRecord.model.js"
const router = Router()

router.post('/', async (req, res) => {
  const body = req.body
  const record = new financialRecord(body)
  const response = await record.save()
  res.send(response)

})
  .get('/', async (req, res) => {
    const response = await financialRecord.find({})
    res.json(response)
  })

  .put('/', async (req, res) => {
    const updatedRecord = req.body

    const response = await financialRecord.findOneAndUpdate({ _id: updatedRecord._id }, updatedRecord)
    res.send(response)
  })
  .delete('/', async (req, res) => {
    const id = req.body._id

    const response = await financialRecord.findOneAndDelete({ _id: id })
    res.send(response)
  })


export { router }