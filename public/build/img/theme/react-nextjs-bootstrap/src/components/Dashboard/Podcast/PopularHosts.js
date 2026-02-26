"use client";

import { Table } from "react-bootstrap";
import Image from "next/image";
import { useState } from "react";

const hostsData = [
  {
    id: 1,
    name: "Sarah W.",
    category: "Marketing",
    hosted: 25,
    image: "/images/user-124.png",
    isFollowing: false,
  },
  {
    id: 2,
    name: "Tom R.",
    category: "Blogging",
    hosted: 30,
    image: "/images/user-125.png",
    isFollowing: false,
  },
  {
    id: 3,
    name: "Amanda G.",
    category: "Branding",
    hosted: 28,
    image: "/images/user-126.png",
    isFollowing: true,
  },
  {
    id: 4,
    name: "Lisa Kim",
    category: "Storytelling",
    hosted: 20,
    image: "/images/user-127.png",
    isFollowing: false,
  },
  {
    id: 5,
    name: "David C.",
    category: "Social Media",
    hosted: 18,
    image: "/images/user-128.png",
    isFollowing: false,
  },
];

const PopularHosts = () => {
  const [hosts, setHosts] = useState(hostsData);

  const toggleFollow = (id) => {
    setHosts((prevHosts) =>
      prevHosts.map((host) =>
        host.id === id ? { ...host, isFollowing: !host.isFollowing } : host
      )
    );
  };

  return (
    <div
      className="card custom-shadow rounded-3 bg-white border mb-4"
      style={{ paddingBottom: "24px" }}
    >
      <div
        className="d-flex justify-content-between align-items-center flex-wrap gap-3 custom-padding-30 position-relative pb-3"
        style={{ top: "-5px" }}
      >
        <h3 className="mb-0 fs-18 fw-semibold">Popular Hosts</h3>
        <button
          className="bg-transparent border-0 p-0 d-flex align-items-center text-decoration-none position-relative text-body"
          style={{ right: "-8px" }}
        >
          <span>View All</span>
          <i className="ri-arrow-right-s-line fs-24 position-relative top-1 lh-1 text-body"></i>
        </button>
      </div>

      <div className="default-table-area style-three popular-hosts">
        <div className="table-responsive">
          <Table className="align-middle border-0">
            <tbody>
              {hosts.map((host) => (
                <tr key={host.id}>
                  <td>
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0">
                        <Image
                          src={host.image}
                          className="rounded-circle"
                          alt={host.name}
                          width={40}
                          height={40}
                        />
                      </div>
                      <div className="flex-grow-1 ms-10">
                        <h4 className="fs-14 fw-medium mb-0">{host.name}</h4>
                        <span className="fs-12 text-body fw-normal">
                          {host.category}
                        </span>
                      </div>
                    </div>
                  </td>

                  <td>
                    <span className="d-block fs-14 fw-medium">
                      {host.hosted}
                    </span>
                    <span className="d-block fs-12 fw-normal text-body">
                      Hosted
                    </span>
                  </td>

                  <td className="text-end">
                    <button
                      className={`border-0 text-primary follow-button fs-14 ${
                        host.isFollowing ? "followed" : ""
                      }`}
                      style={{
                        backgroundColor: "#ECF0FF",
                        padding: "4.5px 10px",
                        borderRadius: "4px",
                      }}
                      onClick={() => toggleFollow(host.id)}
                    >
                      {host.isFollowing ? "Following" : "Follow"}
                    </button>
                  </td>
                </tr>
              ))}
            </tbody>
          </Table>
        </div>
      </div>
    </div>
  );
};

export default PopularHosts;
