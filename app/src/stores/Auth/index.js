import { types, flow } from 'mobx-state-tree'
import AuthStoreModel from './models/AuthStoreModel'

const initialState = {
  user: {},
}

const BaseStore = types
  .model({
    created: true,
  })
  .actions((self) => ({
    afterCreate() {
      Object.assign(self, initialState)
    },
  }))

const AuthStore = types.compose('authStore', BaseStore, AuthStoreModel)

export default AuthStore
