"use client";

import { Card } from "react-bootstrap";
import Image from "next/image"; 

const ProfileIntro = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h3 className="mb-4">Profile Intro</h3>

          <div className="d-flex align-items-center mb-4">
            <div className="flex-shrink-0">
              <Image
                src="/images/user-68.jpg"
                className="rounded-circle border border-2 wh-75"
                alt="user"
                width={75}
                height={75}
              />
            </div>
            <div className="flex-grow-1 ms-3">
              <h4 className="fs-17 mb-1 fw-semibold">Alice Johnson</h4>
              <span className="fs-14">Product designer</span>
            </div>
          </div>

          <h4 className="fw-semibold fs-14 mb-2">About Me</h4>
          <p>
            Molestie tincidunt ut consequat a urna tortor. Vitae velit ac nisl
            velit mauris placerat nisi placerat. Pellentesque viverra lorem
            malesuada nunc tristique sapien. Imperdiet sit hendrerit tincidunt
            bibendum donec adipiscing.
          </p>

          <h4 className="fw-semibold fs-14 mb-2 pb-1">Social Profile</h4>
          <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-2">
            <li>
              <a
                href="https://www.facebook.com/"
                target="_blank"
                className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                style={{ backgroundColor: '#3a559f' }}
              >
                <i className="ri-facebook-fill"></i>
              </a>
            </li>
            <li>
              <a
                href="https://www.twitter.com/"
                target="_blank"
                className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y" 
                style={{ backgroundColor: '#03a9f4' }}
              >
                <i className="ri-twitter-x-line"></i>
              </a>
            </li>
            <li>
              <a
                href="https://www.linkedin.com/"
                target="_blank"
                className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y" 
                style={{ backgroundColor: '#007ab9' }}
              >
                <i className="ri-linkedin-fill"></i>
              </a>
            </li>
            <li>
              <a
                href="https://www.google.com/"
                target="_blank"
                className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y" 
                style={{ backgroundColor: '#2196f3' }}
              >
                <i className="ri-mail-line"></i>
              </a>
            </li>
          </ul>
        </Card.Body>
      </Card>
    </>
  );
};

export default ProfileIntro;
