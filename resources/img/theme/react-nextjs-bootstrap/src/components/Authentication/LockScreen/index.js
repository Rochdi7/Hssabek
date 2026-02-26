"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";

const LockScreen = () => {
  return (
    <>
      <div className="auth-main-content m-auto m-1230 px-3">
        <form style={{ maxWidth: "550px" }}>
          <Card className="bg-primary bg-opacity-10 border-0 rounded-0 rounded-top-3 position-relative">
            <Card.Body className="p-4 pb-5 my-2">
              <div className="mw-350 text-center">
                <h3 className="text-primary fw-semibold fs-20 mb-2">
                  Welcome to Trezo Dashboard !
                </h3>

                <p className="text-primary fs-15">
                  You have done 68% 😎 more sales today. Check your new badge in
                  your profile.
                </p>
              </div>
            </Card.Body>
          </Card>

          <Card className="bg-white border-0 rounded-bottom-3 mb-4">
            <Card.Body className="p-4">
              <div className="text-center">
                <Image
                  src="/images/user-53.jpg"
                  className="wh-55 border border-2 border-color-white"
                  alt="user"
                  style={{
                    boxShadow: "0px 4px 15px 0px rgba(82, 150, 212, 0.08)",
                  }}
                  width={55}
                  height={55}
                />
                <span className="d-block fs-16 fw-semibold text-dark mt-1 mb-4">
                  Andrew Burns
                </span>
              </div>

              <div className="form-group mb-4">
                <label className="label text-secondary">Password</label>

                <div className="form-group">
                  <div className="password-wrapper position-relative">
                    <input
                      type="password"
                      id="password"
                      className="form-control h-58 text-dark" 
                      placeholder='Password'
                    />
                  </div>
                </div>
              </div>

              <button
                type="submit"
                className="btn btn-primary fs-16 fw-medium text-dark heading-fornt py-2 px-4 text-white w-100"
              >
                Unlock
              </button>
            </Card.Body>
          </Card>
        </form>
      </div>
    </>
  );
};

export default LockScreen;
