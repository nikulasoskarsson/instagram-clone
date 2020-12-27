import { types, flow } from 'mobx-state-tree'
import AuthStoreModel from './models/AuthStoreModel'
import instagramAPI from '../../utilities/api'

const initialState = {
  token: null,
}

const BaseStore = types
  .model({
    created: true,
  })
  .actions((self) => ({
    afterCreate() {
      Object.assign(self, initialState)
    },
    createUser: flow(function* (user) {
      try {
        const res = yield instagramAPI.post(
          '/api-create-user.php',
          JSON.stringify(user)
        )
        console.log('the res,', res)
      } catch (error) {
        console.log('error:', error)
      }
    }),
  }))

const AuthStore = types.compose('authStore', BaseStore, AuthStoreModel)

export default AuthStore
