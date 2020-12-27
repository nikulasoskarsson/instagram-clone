import { types } from 'mobx-state-tree'

const AuthStoreModel = types.model('authStore', {
  token: types.maybeNull(types.string),
})

export default AuthStoreModel
