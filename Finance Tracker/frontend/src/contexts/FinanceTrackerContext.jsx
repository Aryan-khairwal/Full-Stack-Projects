import { createContext, useContext, useState } from "react";

export const FinanceTrackerContext = createContext({
  records: [{}],
  addRecord: (record) => { },
  updateRecord: (id, newRecord) => { },
  deleteRecord: function (id) { }
})

const FTcontextProvider = ({ children }) => {
  const [records, setRecords] = useState([])
  return (
    <FinanceTrackerContext.Provider value={{ records, setRecords, addRecord, updateRecord, deleteRecord }}>
      {children}
    </FinanceTrackerContext.Provider>
  )
}

export default FTcontextProvider

