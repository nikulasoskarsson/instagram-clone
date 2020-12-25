import React from 'react'
import { View, Text, TouchableOpacity } from 'react-native'
import { useNavigation } from '@react-navigation/native'

const index = ({}) => {
  const navigation = useNavigation()
  return (
    <View>
      <TouchableOpacity onPress={() => navigation.navigate('Signup')}>
        <Text>Go to signup screen</Text>
      </TouchableOpacity>
    </View>
  )
}

export default index
