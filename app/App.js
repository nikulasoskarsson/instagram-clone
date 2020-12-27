import { StatusBar } from 'expo-status-bar'
import React from 'react'
import { StyleSheet, Text, View } from 'react-native'
import { NavigationContainer } from '@react-navigation/native'
import AuthStack from './src/navigation/AuthNavigation'
import AuthLoading from './src/modules/authLoading'
import { Provider } from 'mobx-react'
import RootStore from './src/stores/Rootstore'
import { ThemeProvider } from 'styled-components'
import ThemeStore from './src/theme/ThemeStore'

const stores = {
  authStore: RootStore.auth,
}
console.log('stores', RootStore.auth)
export default function App() {
  return (
    <Provider {...stores}>
      <ThemeProvider theme={ThemeStore}>
        <NavigationContainer>
          <StatusBar style='auto' />
          <AuthLoading />
        </NavigationContainer>
      </ThemeProvider>
    </Provider>
  )
}
