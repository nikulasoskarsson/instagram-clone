import React from 'react'
import { View, Text, TouchableOpacity } from 'react-native'
import { useNavigation } from '@react-navigation/native'
import { inject } from 'mobx-react'

const index = (props) => {
  console.log('authStore', props)
  const navigation = useNavigation()
  return (
    <View>
      <TouchableOpacity onPress={() => navigation.navigate('Login')}>
        <Text>Login in screen</Text>
      </TouchableOpacity>
    </View>
  )
}

export default inject('authStore')(index)
