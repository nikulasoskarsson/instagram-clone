import { types } from 'mobx-state-tree'
import light from './light'
import dark from './dark'

const ThemeModel = types
  .model({
    currentTheme: types.string,
    // theme: types.map(types.model({ primay: types.string })),
  })
  .actions((self) => ({
    switchTheme: () => (self.currentTheme === 'light' ? dark : light),
  }))

const ThemeStore = ThemeModel.create({
  currentTheme: 'light',
  theme: light,
})

export default ThemeStore
