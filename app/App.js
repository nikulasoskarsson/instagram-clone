import { StatusBar } from 'expo-status-bar'
import React from 'react'
import { StyleSheet, Text, View } from 'react-native'
import { NavigationContainer } from '@react-navigation/native'
import AuthStack from './src/navigation/AuthNavigation'
import AuthLoading from './src/modules/authLoading'

export default function App() {
  return (
    <NavigationContainer>
      <StatusBar style='auto' />
      <AuthLoading />
    </NavigationContainer>
  )
}
