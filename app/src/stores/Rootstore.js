import { types, getSnapshot, applySnapshot } from 'mobx-state-tree'
import AuthStore from './Auth'

const models = {
  auth: AuthStore,
}

const actions = (self) => {
  let initialState = {}

  return {
    afterCreate: () => {
      initialState = getSnapshot(self)
    },
  }
}

const RootStore = types.model('rootStore', models).actions(actions).create({
  auth: {},
})

export default RootStore
