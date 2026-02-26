"use client";

import { useState } from "react";
import { Card, Col, Button } from "react-bootstrap";
import Image from "next/image";

const Profile = () => {
  // State to manage follow status
  const [isFollowing, setIsFollowing] = useState(false);

  // Toggle follow status
  const toggleFollow = () => {
    setIsFollowing((prev) => !prev);
  };

  return (
    <>
      <div className="mb-4">
        <Card className="border-0 rounded-2 p-4 bg-white mb-4">
          <div className="d-flex align-items-center mb-4">
            <div className="flex-shrink-0 position-relative">
              <Image
                src="/images/nft-21.png"
                className="rounded-circle"
                alt="nft"
                width={65}
                height={65}
              />
            </div>
            <div className="flex-grow-1 ms-3">
              <h4 className="fs-24 fw-semibold mb-1">Angela Carter</h4>
              <span className="fs-12">ID: 35246</span>
            </div>
          </div>

          <div className="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
            <div className="d-flex align-items-center">
              <div className="flex-shrink-0 position-relative">
                <Image
                  src="/images/schedule2.png"
                  alt="schedule2"
                  width={30}
                  height={30}
                />
              </div>
              <div className="flex-grow-1 ms-3">
                <span className="fs-12">Published</span>
                <h4 className="fs-14 fw-semibold mb-0">23 June 2024</h4>
              </div>
            </div>
            <Button
              className={`btn py-2 px-3 ${
                isFollowing ? "btn-secondary" : "btn-primary"
              }`}
              onClick={toggleFollow}
            >
              {isFollowing ? "Unfollow" : "Follow"}
            </Button>
          </div>

          <div className="d-flex flex-wrap justify-content-between gap-3 rounded-3 bg-body-bg p-3 px-sm-4 mb-4">
            <div className="text-center">
              <span className="fs-12 d-block mb-1 text-body">Total NFT</span>
              <h3 className="mb-0 fw-semibold fs-14">156</h3>
            </div>

            <div className="text-center">
              <span className="fs-12 d-block mb-1 text-body">Total Earned</span>
              <h3 className="mb-0 fw-semibold fs-14">1234ETH</h3>
            </div>

            <div className="text-center">
              <span className="fs-12 d-block mb-1 text-body">Auction</span>
              <h3 className="mb-0 fw-semibold fs-14">45</h3>
            </div>
          </div>

          <h3 className="fs-18 mb-3">Description</h3>
          <p>
            This NFT captures the essence of boundless potential, symbolized by
            a surreal landscape where the sky meets the earth in a dazzling
            fusion of colors. The intricate design features flowing lines that
            blend together, representing the limitless paths we can take in
            life.
          </p>
        </Card>
      </div>
    </>
  );
};

export default Profile;
