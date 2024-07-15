import { SignedIn, SignedOut, SignInButton, UserButton } from "@clerk/clerk-react";
import { Navigate } from "react-router-dom";
export default function Auth() {
  return (
    <header>
      <SignedOut>
        <SignInButton mode="modal" />
      </SignedOut>

      <SignedIn>
        <Navigate to={'/'} />
      </SignedIn>

    </header>
  )
}

