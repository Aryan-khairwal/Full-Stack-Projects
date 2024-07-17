import { createContext, useContext, useState } from "react";

export const FinanceTrackerContext = createContext({
  records: [{}],
  addRecord: function (record) { },
  updateRecord: (id, newRecord) => { },
  deleteRecord: function (id) { }
})


export const useFinancialRecords = () => { return useContext(FinanceTrackerContext) }





