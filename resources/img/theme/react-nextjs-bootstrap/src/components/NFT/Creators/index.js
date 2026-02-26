"use client";

import { useState } from "react";
import { Row, Col, Button } from "react-bootstrap";
import Image from "next/image";
import Link from "next/link";

// Initial creators data
const initialCreatorsData = [
  {
    id: 1,
    name: "Hunny Bunny",
    items: 3204,
    coverImage: "/images/top-creator-1.png",
    profileImage: "/images/user-76.gif",
    isVerified: true,
    isFollowing: false,
  },
  {
    id: 2,
    name: "Aristocrat",
    items: 5301,
    coverImage: "/images/top-creator-2.png",
    profileImage: "/images/user-77.gif",
    isVerified: true,
    isFollowing: false,
  },
  {
    id: 3,
    name: "Hooman Robotic",
    items: 4213,
    coverImage: "/images/top-creator-3.png",
    profileImage: "/images/user-78.gif",
    isVerified: true,
    isFollowing: true,
  },
  {
    id: 4,
    name: "Colorful Life",
    items: 2314,
    coverImage: "/images/top-creator-4.png",
    profileImage: "/images/user-98.png",
    isVerified: true,
    isFollowing: false,
  },
  {
    id: 5,
    name: "Anne Bunny",
    items: 4758,
    coverImage: "/images/top-creator-5.png",
    profileImage: "/images/user-99.png",
    isVerified: true,
    isFollowing: false,
  },
  {
    id: 6,
    name: "Piterdess",
    items: 1234,
    coverImage: "/images/top-creator-6.png",
    profileImage: "/images/user-100.png",
    isVerified: true,
    isFollowing: false,
  },
  {
    id: 7,
    name: "Alex Smith",
    items: 8520,
    coverImage: "/images/top-creator-7.png",
    profileImage: "/images/user-101.png",
    isVerified: true,
    isFollowing: false,
  },
  {
    id: 8,
    name: "Straven Dew",
    items: 4562,
    coverImage: "/images/top-creator-8.png",
    profileImage: "/images/user-102.png",
    isVerified: true,
    isFollowing: false,
  },
  {
    id: 9,
    name: "Hooman Robotic",
    items: 4213,
    coverImage: "/images/top-creator-3.png",
    profileImage: "/images/user-78.gif",
    isVerified: true,
    isFollowing: true,
  },
  {
    id: 10,
    name: "Aristocrat",
    items: 5301,
    coverImage: "/images/top-creator-2.png",
    profileImage: "/images/user-77.gif",
    isVerified: true,
    isFollowing: false,
  },
  {
    id: 11,
    name: "Colorful Life",
    items: 2314,
    coverImage: "/images/top-creator-4.png",
    profileImage: "/images/user-98.png",
    isVerified: true,
    isFollowing: false,
  },
  {
    id: 12,
    name: "Hunny Bunny",
    items: 3204,
    coverImage: "/images/top-creator-1.png",
    profileImage: "/images/user-76.gif",
    isVerified: true,
    isFollowing: false,
  },
];

const Creators = () => {
  const [creators, setCreators] = useState(initialCreatorsData);
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 8;

  const totalPages = Math.ceil(creators.length / itemsPerPage);

  // Calculate items to show based on current page
  const indexOfLastItem = currentPage * itemsPerPage;
  const indexOfFirstItem = indexOfLastItem - itemsPerPage;
  const currentCreators = creators.slice(indexOfFirstItem, indexOfLastItem);

  const toggleFollow = (id) => {
    setCreators((prevCreators) =>
      prevCreators.map((creator) =>
        creator.id === id
          ? { ...creator, isFollowing: !creator.isFollowing }
          : creator
      )
    );
  };

  const goToPreviousPage = () => {
    setCurrentPage((prev) => (prev > 1 ? prev - 1 : prev));
  };

  const goToNextPage = () => {
    setCurrentPage((prev) => (prev < totalPages ? prev + 1 : prev));
  };

  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Top Creators</h3>
        <Link href="/nft/creators" className="d-flex text-decoration-none">
          <span>Browse All</span>
          <i className="ri-arrow-right-s-line fs-15"></i>
        </Link>
      </div>

      <Row className="justify-content-center">
        {currentCreators.map((creator) => (
          <Col key={creator.id} sm={6} md={4} lg={3}>
            <div className="bg-white rounded-3 border-0 p-3 place-bid for-dark-card mb-4 text-center">
              <div className="position-relative">
                <Image
                  src={creator.coverImage}
                  className="rounded-3 w-100"
                  alt="top-creator"
                  width={230}
                  height={220}
                />
                <div className="position-absolute top-100 start-50 translate-middle">
                  <Image
                    src={creator.profileImage}
                    className="rounded-circle"
                    alt="user"
                    width={64}
                    height={64}
                  />
                  {creator.isVerified && (
                    <Image
                      src="/images/verify.svg"
                      className="position-absolute bottom-0 end-0"
                      alt="verify"
                      width={20}
                      height={20}
                    />
                  )}
                </div>
              </div>
              <div className="mt-5 border-bottom pb-3 mb-3">
                <h4 className="fs-16 fw-semibold">{creator.name}</h4>
                <span className="fs-12">ITEMS: {creator.items}</span>
              </div>
              <Button
                className={`btn ${
                  creator.isFollowing ? "btn-secondary" : "btn-primary"
                } py-2 px-4 fs-16 fw-medium`}
                onClick={() => toggleFollow(creator.id)}
              >
                {creator.isFollowing ? "Unfollow" : "Follow"}
              </Button>
            </div>
          </Col>
        ))}

        <div className="col-lg-12">
          <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mb-4">
            <span className="fs-12 fw-medium">
              Showing {indexOfFirstItem + 1} to{" "}
              {Math.min(indexOfLastItem, creators.length)} of {creators.length}{" "}
              Results
            </span>

            <nav aria-label="Page navigation example">
              <ul className="pagination mb-0 justify-content-center">
                <li className="page-item">
                  <Button
                    className={`page-link icon ${
                      currentPage === 1 ? "disabled" : ""
                    }`}
                    onClick={goToPreviousPage}
                  >
                    <i className="material-symbols-outlined">
                      keyboard_arrow_left
                    </i>
                  </Button>
                </li>
                <li className="page-item">
                  <Button
                    className={`page-link icon ${
                      currentPage === totalPages ? "disabled" : ""
                    }`}
                    onClick={goToNextPage}
                  >
                    <i className="material-symbols-outlined">
                      keyboard_arrow_right
                    </i>
                  </Button>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </Row>
    </>
  );
};

export default Creators;
