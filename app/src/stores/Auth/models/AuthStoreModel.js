import { types } from 'mobx-state-tree'

const AuthStoreModel = types.model('authStore', {
  user: types.maybeNull(types.map(types.model({}))),
})

export default AuthStoreModel
