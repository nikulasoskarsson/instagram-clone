import { StatusBar } from 'expo-status-bar'
import React from 'react'
import { StyleSheet, Text, View } from 'react-native'
import { NavigationContainer } from '@react-navigation/native'
import AuthStack from './src/navigation/AuthNavigation'

export default function App() {
  return (
    <NavigationContainer>
      <StatusBar style='auto' />
      <AuthStack />
    </NavigationContainer>
  )
}
