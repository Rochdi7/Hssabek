"use client";

import { useState } from "react";
import { Row, Col, Button, Card } from "react-bootstrap";
import Image from "next/image";

const ConnectWallet = () => {
  // Define wallet data in state
  const [wallets, setWallets] = useState([
    {
      id: 1,
      image: "/images/wallet-1.png",
      name: "Metamask",
      description: "MetaMask is a software cryptocurrency wallet used to interact with the Ethereum blockchain.",
    },
    {
      id: 2,
      image: "/images/wallet-2.png",
      name: "Binance",
      description: "Binance offers a relatively secure, versatile way to invest in and trade cryptocurrencies.",
    },
    {
      id: 3,
      image: "/images/wallet-3.png",
      name: "Coinbase",
      description: "Coinbase Wallet is a software product that gives you access to a wide spectrum.",
    },
    {
      id: 4,
      image: "/images/user-76.gif",
      name: "Hello Thumbs",
      description: "MetaMask is a software cryptocurrency wallet used to interact with the Ethereum blockchain.",
    },
    {
      id: 5,
      image: "/images/user-77.gif",
      name: "Christmas Eve",
      description: "Binance offers a relatively secure, versatile way to invest in and trade cryptocurrencies.",
    },
    {
      id: 6,
      image: "/images/user-78.gif",
      name: "Humming Bird",
      description: "Coinbase Wallet is a software product that gives you access to a wide spectrum.",
    },
  ]);

  return (
    <Row className="justify-content-center">
      {wallets.map((wallet) => (
        <Col key={wallet.id} sm={6} lg={4} className="mb-4">
          <Card className="bg-white border-0 rounded-3 p-4 py-lg-5 text-center h-100">
            <div className="mb-3">
              <Image
                src={wallet.image}
                className="rounded-circle"
                alt={wallet.name}
                width={54}
                height={54}
              />
            </div>
            <h3 className="mb-3">{wallet.name}</h3>
            <p style={{ maxWidth: "285px" }} className="mx-auto mb-4">
              {wallet.description}
            </p>
            <div>
              <Button className="btn btn-primary py-2 px-4">Connect</Button>
            </div>
          </Card>
        </Col>
      ))}
    </Row>
  );
};

export default ConnectWallet;
